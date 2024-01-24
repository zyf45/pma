<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class AuthController extends Controller
{

    // 显示雇主注册页面
    public function showRegistrationForm()
    {
        // 注册页面
        return view('employer/register');
    }

    // 雇主注册请求
    public function register(Request $request)
    {
        // 从请求中获取注册信息
        $userData = $request->only(['user', 'pass']);

        // 查询雇主记录
        $existingEmployer = Employer::where('user', $userData['user'])->first();

        // 检查是否存在相同的用户名
        if ($existingEmployer) {
            return redirect()->route('register')->with('msg', 'Username already exits!');
        }

        // 如果不存在相同的用户名，创建雇主记录
        Employer::create($userData);

        // 返回响应，表示注册成功
        return redirect()->route('login')->with('msg', 'Register successful!');
    }

    // 显示雇主登录页面
    public function showLoginForm(Request $request)
    {
        //如果已经登录过了
        if (!empty($request->session()->get('employer'))) {
            // 跳转到首页
            return redirect()->route('dashboard');
        }
        // 登录页面
        return view('employer/login');
    }

    // 处理雇主登录请求
    public function login(Request $request)
    {
        // 从请求中获取登录信息
        $credentials = $request->only(['user', 'pass']);

        // 查询雇主记录
        $employer = Employer::where('user', $credentials['user'])->first();

        // 检查是否存在匹配的雇主记录
        if ($employer && $credentials['pass'] == $employer->pass) {
            // 登录成功，设置 session
            $request->session()->put('employer', $employer->id);
            return redirect()->route('dashboard');
        }

        // 登录失败
        return redirect()->route('login')->with('msg', 'Username or password error!');
    }


    // 雇主退出登录
    public function logout(Request $request)
    {
        // 清除session
        $request->session()->remove('employer');
        // 跳转到登录页面
        return redirect()->route('login');
    }

}
