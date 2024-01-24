<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\InternshipPosition;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // 实习岗位列表
    public function index()
    {
        // 获取所有实习岗位数据
        $internshipPositions = InternshipPosition::all();

        // 主页面，并传递实习岗位数据到视图
        return view('dashboard', ['internshipPositions' => $internshipPositions]);
    }

    // 筛选实习岗位
    public function filter(Request $request)
    {
        // 雇主筛选
        $employerFilter = $request->query('employer');
        // 专业筛选
        $categoryFilter = $request->query('category');

        // 查询条件
        $filteredInternships = InternshipPosition::query();

        // 如果雇主筛选不是全部
        if ($employerFilter != 'all') {
            $filteredInternships->where('employer_id', $employerFilter);
        }

        // 如果专业筛选不是全部
        if ($categoryFilter != 'all') {
            $filteredInternships->where('major', $categoryFilter);
        }

        // 获取数据
        $filteredInternships = $filteredInternships->get();

        // json数据返回
        return response()->json($filteredInternships);
    }

    // 获取全部的雇主
    public function getEmployers()
    {
        // 获取所有的雇主数据 指定字段[id,user]
        $employers = Employer::all('id', 'user');
        return response()->json($employers);
    }

    // 按最新发布的实习岗位排序
    public function sortLatest()
    {
        // 获取发布最晚的所有实习岗位数据
        $internshipPositions = InternshipPosition::latest()->get();
        return response()->json($internshipPositions);
    }

    // 创建实习岗位页面
    public function showAdd()
    {
        // 添加页面
        return view('add');
    }

    // 添加实习岗位
    public function add(Request $request)
    {

        // 参数验证
        $request->validate([
            'title' => 'required|string', // 岗位标题必填，且为字符串
            'content' => 'required|string', // 岗位描述必填，且为字符串
            'major' => 'required|in:it,accounting,business', // 专业要求必填，且为it, accounting, business中的一个
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 照片可选，如果有必须为图片格式，最大2MB
        ]);

        // 处理上传的照片
        $photoPath = null; // 默认为 null
        // 如果上传了图片
        if ($request->hasFile('photo')) {
            // 存储图片到/storage/app/public/photos目录下 返回图片路径
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // 新增数据
        InternshipPosition::create([
            'employer_id' => $request->session()->get('employer'), // 获取session的employer_id
            'title' => $request->input('title'), // 岗位标题
            'content' => $request->input('content'), // 岗位描述
            'major' => $request->input('major'), // 专业
            'photo' => $photoPath ?? '', // 图片路径
        ]);

        return redirect()->route('dashboard')->with('msg', 'Post successful！');
    }

    // 编辑实习岗位页面
    public function showEdit($id)
    {
        // 通过ID查询实习岗位
        $internship = InternshipPosition::findOrFail($id);
        // 将数据渲染到页面
        return view('edit', ['internship' => $internship]);
    }

    // 编辑实习岗位
    public function edit(Request $request, $id)
    {
        // 参数验证
        $request->validate([
            'title' => 'required|string', // 岗位标题必填，且为字符串
            'content' => 'required|string', // 岗位描述必填，且为字符串
            'major' => 'required|in:it,accounting,business', // 专业要求必填，且为it, accounting, business中的一个
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 照片可选，如果有必须为图片格式，最大2MB
        ]);

        // 获取session的employer_id
        $employer_id = $request->session()->get('employer');

        // 查询数据
        $internshipPosition = InternshipPosition::where('employer_id',$employer_id)->findOrFail($id);

        // 处理上传的照片
        $photoPath = $internshipPosition->photo; // 默认为 之前的图片
        // 如果上传了图片
        if ($request->hasFile('photo')) {
            // 存储图片到/storage/app/public/photos目录下 返回图片路径
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // 更新数据
        $internshipPosition->update([
            'employer_id' => $employer_id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'major' => $request->input('major'),
            'photo' => $photoPath,
        ]);


        return redirect()->route('dashboard')->with('msg', 'Edit successful!');
    }
}
