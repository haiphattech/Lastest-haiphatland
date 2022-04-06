<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Category;
use App\Models\Event;
use App\Models\Investor;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\News;
use App\Models\Project;
use App\Models\Recruit;
use App\Models\statusProject;
use App\Models\System;
use App\Models\TypePermission;
use App\Models\TypeProject;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Ajax\BaseController as BaseController;

class AjaxController extends BaseController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function enableColumn(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required',
            'table' => 'required',
            'column' => 'required',
        ])->validate();

        $id = $request->get('id');
        $column = $request->get('column');

        $model = null;
        switch ($request->get('table')) {
            case 'categories':
                $model = Category::find($id);
                break;
            case 'news':
                $model = News::find($id);
                break;
            case 'type_permissions':
                $model = TypePermission::find($id);
                break;
            case 'permissions':
                $model = Permission::find($id);
                break;
            case 'users':
                $model = User::find($id);
                break;
            case 'videos':
                $model = Video::find($id);
                break;
            case 'menus':
                $model = Menu::find($id);
                break;
            case 'investors':
                $model = Investor::find($id);
                break;
            case 'status_projects':
                $model = statusProject::find($id);
                break;
            case 'type_projects':
                $model = TypeProject::find($id);
                break;
            case 'projects':
                $model = Project::find($id);
                break;
            case 'events':
                $model = Event::find($id);
                break;
            case 'systems':
                $model = System::find($id);
                break;
            case 'recruits':
                $model = Recruit::find($id);
                break;
            default:
                break;
        }

        if ($model) {
            $result = $model->update([
                $column => $model[$column] ? 0 : 1
            ]);

            return $this->sendResponse($result, 'successfully.');
        }

        return $this->sendResponse(false, 'successfully.');
    }

}
