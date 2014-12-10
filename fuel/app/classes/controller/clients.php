<?php
class Controller_Clients extends Controller_Template{

	public function action_index()
	{
		$data['clients'] = Model_Client::find_all();
		$this->template->title = "Clients";
		$this->template->content = View::forge('clients/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('clients');

		$data['client'] = Model_Client::find_by_pk($id);

		$this->template->title = "Client";
		$this->template->content = View::forge('clients/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Client::validate('create');
			
			if ($val->run())
			{
				$client = Model_Client::forge(array(
					'name' => Input::post('name'),
				));

				if ($client and $client->save())
				{
					Session::set_flash('success', 'Added client #'.$client->id.'.');
					Response::redirect('clients');
				}
				else
				{
					Session::set_flash('error', 'Could not save client.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Clients";
		$this->template->content = View::forge('clients/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('clients');

		$client = Model_Client::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Client::validate('edit');

			if ($val->run())
			{
				$client->name = Input::post('name');

				if ($client->save())
				{
					Session::set_flash('success', 'Updated client #'.$id);
					Response::redirect('clients');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('client', $client, false);
		$this->template->title = "Clients";
		$this->template->content = View::forge('clients/edit');

	}

	public function action_delete($id = null)
	{
		if ($client = Model_Client::find_one_by_id($id))
		{
			$client->delete();

			Session::set_flash('success', 'Deleted client #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete client #'.$id);
		}

		Response::redirect('clients');

	}


}
