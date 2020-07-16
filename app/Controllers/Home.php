<?php namespace App\Controllers;

use App\Models\UserModel;
use http\Env\Request;


class Home extends BaseController
{
    public function index()
	{
	    $isFormValid = true;
        if ($_POST) {
            $rules = [
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
            ];
            $isFormValid = $this->validate($rules);
            if ($isFormValid) {
                $model = new UserModel();
                $model->save([
                    'username' => $this->request->getVar('username'),
                    'email'  => $this->request->getVar('email'),
                ]);
                return redirect()->to('/main');
            }
        }
        $cssFormValid = $isFormValid ? '' : 'was-validated';
        echo view('welcome_message', ['title' => 'Register form', 'cssValid' => $cssFormValid ]);
	}

    public function main()
    {
        $model = new UserModel();
        $registered_users = $model->asObject()->findAll();
        echo view('success', ['registered_users'=>$registered_users]);
    }


}
