<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Category;
use App\Models\Events;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\News;
use App\Models\TypePermission;
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
            default:
                break;
        }

        if ($model) {
            $result = $model->update([
                $column => $model[$column] ? 0 : 1
            ]);

            return $this->sendResponse($result, 'Product created successfully.');
        }

        return $this->sendResponse(false, 'Product created successfully.');
    }

    public function removeRows(Request $request)
    {
        $id = $request->get('id');
        $model = null;
        switch ($request->get('table')) {
            case 'categories':
                $model = Category::find($id);
                break;
            case 'products':
                $model = Product::find($id);
                break;
            case 'staffs':
                $model = Staff::find($id);
                break;
            case 'posts':
                $model = Post::find($id);
                break;
            case 'slides':
                $model = Slide::find($id);
                break;
            case 'videos':
                $model = Video::find($id);
                break;
            case 'customer-reviews':
                $model = CustomerReview::find($id);
                break;
            default:
                break;
        }

        if($model){
            $model->delete();
            return $this->sendResponse('', 'Success.');
        }

        return $this->sendResponse('', 'Faild.');
    }
}
