<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository as eventRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProjectRepository as ProjectRepo;
use App\Repositories\NewsRepository as NewsRepo;
use App\Repositories\SystemRepository as SystemRepo;
use App\Repositories\CandidateRepository as CandidateRepo;
use App\Repositories\ContactRepository as ContactRepo;
use App\Repositories\StatusProjectRepository as StatusProjectRepo;

class HomeController extends Controller
{
    protected $projectRepo;
    protected $eventRepo;
    protected $newsRepo;
    protected $systemRepo;
    protected $candidateRepo;
    protected $contactRepo;
    protected $statusProjectRepo;
    public function __construct(StatusProjectRepo $statusProjectRepo, ContactRepo $contactRepo, EventRepo $eventRepo, ProjectRepo $projectRepo, NewsRepo $newsRepo, SystemRepo $systemRepo, CandidateRepo $candidateRepo)
    {
        $this->eventRepo = $eventRepo;
        $this->newsRepo = $newsRepo;
        $this->projectRepo = $projectRepo;
        $this->systemRepo = $systemRepo;
        $this->candidateRepo = $candidateRepo;
        $this->contactRepo = $contactRepo;
        $this->statusProjectRepo = $statusProjectRepo;
    }
    public function index()
    {
        $projects = $this->projectRepo->projectAll('vi');
        $news = $this->newsRepo->newsAll();
        $systems = $this->systemRepo->newsAll();
        $candidates = $this->candidateRepo->candidateAll();
        $contacts = $this->contactRepo->contactAll();
        $statusProjects = $this->statusProjectRepo->statusProjectAll();
        foreach ($statusProjects as $statusProject){
            $statusProject['countProject'] = $statusProject->projects()->count();
            $statusProject['color'] = '#'.substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        return view('dashboard',[
            'projects'  => $projects,
            'news'      => $news,
            'systems'   => $systems,
            'candidates'=> $candidates,
            'contacts'  => $contacts,
            'statusProjects' => $statusProjects
        ]);
    }
    public function showChangePasswordGet() {
        return view('auth.change-password');
    }
    public function changePasswordPost(Request $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);
        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->with('error','Mật khẩu hiện tại không đúng');
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success','Đổi mật khẩu thánh công');
    }
}
