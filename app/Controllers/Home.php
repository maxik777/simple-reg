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
                'email'  => [
                    'rules'=>'required|valid_email|check_email|is_unique[users.email]',
                    'errors' => [
                        'check_email' => 'Email is not real!',
                    ]
                ],
                'g-recaptcha-response' => [
                    'rules'=>'required|recaptcha',
                    'errors'=> [
                        'recaptcha' => 'Something wrong with captcha, try again.'
                    ]
                ],
            ]))
            {
                return view('welcome_message', ['title' => 'Register form']);
            }
            else
            {
                $session = session();
                $model->save([
                    'username' => $this->request->getVar('username'),
                    'email'  => $this->request->getVar('email'),
                ]);
                return redirect()->to('/main');
            }
        }
        return redirect()->to('/');

    }

    public function main()
    {
        $model = new UserModel();
        $registered_users = $model->asObject()->findAll();
        echo view('success', ['registered_users'=>$registered_users]);
    }


}
