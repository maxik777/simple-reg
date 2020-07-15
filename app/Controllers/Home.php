<?php namespace App\Controllers;

use App\Models\UserModel;
use http\Env\Request;


class Home extends BaseController
{
    public function index()
	{
        echo view('welcome_message', ['title' => 'Register form']);
	}

	public function register()
    {

        if ($_POST){
            //$this->recaptcha($_POST);
            $model = new UserModel();
            if (! $this->validate([
                'username' => 'required|min_length[3]|max_length[255]',
                'email'  => 'required|valid_email|check_email',
                'captcha'  => 'required|recaptcha'
            ]))
//        |is_unique[users.email]
            {
                return view('welcome_message', ['title' => 'Register form']);
            }
            else
            {
                $model->save([
                    'username' => $this->request->getVar('username'),
                    'email'  => $this->request->getVar('email'),
                ]);
                return redirect()->to('/main');
            }
        }
        return redirect()->to('/');

    }

    public function validate_member($str)
    {

    }

    public function main()
    {
        $model = new RegisterModel();
        $registered_users = $model->asObject()->findAll();
        echo view('success', ['registered_users'=>$registered_users]);
    }


}
