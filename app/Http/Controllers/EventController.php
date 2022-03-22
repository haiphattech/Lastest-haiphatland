<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Repositories\eventRepository as eventRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EventController extends Controller
{
    protected $view = 'events';
    protected $eventRepo;
    protected $categoryRepo;

    public function __construct(EventRepo $eventRepo, CategoryRepo $categoryRepo)
    {
        $this->eventRepo = $eventRepo;
        $this->categoryRepo = $categoryRepo;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        $this->authorize('viewAny', $event);
        $events = $this->eventRepo->getData();
        return view($this->view.'.index',[
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $this->authorize('create', $event);
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('events', $lang);
        $event = new Event();
        return view($this->view.'.create',[
            'event'   => $event,
            'view'      => $this->view,
            'lang'      => $lang,
            'parent_lang' => $parent_lang,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLanguage(Event $event, $lang, $item_id)
    {
        $this->authorize('create', $event);
        $parent_lang = $item_id;
        $categories = $this->categoryRepo->getCategoryByType('events', $lang);
        $event = new Event();
        return view($this->view.'.create',[
            'event'         => $event,
            'view'          => $this->view,
            'lang'          => $lang,
            'parent_lang'   => $parent_lang,
            'categories'    => $categories,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->only('name', 'category_id', 'avatar', 'cover', 'place', 'address', 'description', 'lang', 'parent_lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['start_time'] = date('Y-m-d H:i:s', strtotime($request['start_time']));
        $data['end_time'] = date('Y-m-d H:i:s', strtotime($request['end_time']));
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $data['slug'] = Str::slug($request->name);
        $result = $this->eventRepo->create($data);
        $data = [];
        $data['slug'] = $result['slug'].'-'.$result['id'];
        $this->eventRepo->update($data, $result['id']);
        return redirect(route('events.index'))->with('success',  'Thêm thành công');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        $lang = $event['lang'];
        $parent_lang = $event['parent_lang'];
        $categories = $this->categoryRepo->getCategoryByType('events', $lang);
        return view($this->view.'.update', [
            'event' =>  $event,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'view'      => $this->view,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->only('name', 'category_id', 'avatar', 'cover', 'place', 'address', 'description');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['start_time'] = date('Y-m-d H:i:s', strtotime($request['start_time']));
        $data['end_time'] = date('Y-m-d H:i:s', strtotime($request['end_time']));
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['slug'] = Str::slug($request->name);
        $result = $this->eventRepo->update($data, $event['id']);
        $data = [];
        $data['slug'] = $request->name.'-'.$event['id'];
        $this->eventRepo->update($data, $event['id']);
        return redirect(route('events.index'))->with('success',  'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();
        return redirect()->route('events.index')->with('success','Xóa thành công');
    }
}
