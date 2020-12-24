<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommonRequest;
use Cache;
use Iamxcd\LaravelCRUD\Traits\HasResponse;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    use HasResponse;

    protected $request;

    public function __construct()
    {
        $this->request = app(CommonRequest::class);
    }

    public function upload(Request $request)
    {
        $request = $this->request;
        $request->validated();

        // 都换成小写的后缀
        $ext = strtolower($request->file->extension());
        $allowExt = [];
        $type = $request->type;

        switch ($type) {
            case 'image':
                $allowExt = [
                    'jpg', 'png', 'jpeg'
                ];
                break;
            case 'audio':
                $allowExt = [
                    'mp3'
                ];
                break;
            default:
                $allowExt = [
                    'jpg', 'png', 'jpeg'
                ];
                $type = 'file';
                break;
        }


        if (!in_array($ext, $allowExt)) {
            return $this->responseError('不允许的格式');
        }

        $origineName = $request->file->getClientOriginalName();

        $path = $type . '/' . date('Y/m/d', now()->timestamp);
        $path = $request->file->store($path, 'public');

        return $this->response([
            'url' => config('filesystems.disks.public.url') . '/' . $path,
            'path' => $path,
            'name' => $origineName
        ], '上传成功');
    }
}
