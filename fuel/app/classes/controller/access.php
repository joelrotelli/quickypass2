<?php
class Controller_Access extends Controller_Template{

	public function action_index()
	{
		$data['accesses'] = Model_Access::find_all();
		$this->template->title = "Accesses";
		$this->template->content = View::forge('access/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('access');

		$data['access'] = Model_Access::find_by_pk($id);

		$this->template->title = "Access";
		$this->template->content = View::forge('access/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Access::validate('create');
			
			if ($val->run())
			{
				$access = Model_Access::forge(array(
					'name' => Input::post('name'),
					'desc' => Input::post('desc'),
					'project_id' => Input::post('project_id'),
				));

				if ($access and $access->save())
				{
					Session::set_flash('success', 'Added access #'.$access->id.'.');
					Response::redirect('access');
				}
				else
				{
					Session::set_flash('error', 'Could not save access.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Accesses";
		$this->template->content = View::forge('access/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('access');

		$access = Model_Access::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Access::validate('edit');

			if ($val->run())
			{
				$access->name = Input::post('name');
				$access->desc = Input::post('desc');
				$access->project_id = Input::post('project_id');

				if ($access->save())
				{
					Session::set_flash('success', 'Updated access #'.$id);
					Response::redirect('access');
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

		$this->template->set_global('access', $access, false);
		$this->template->title = "Accesses";
		$this->template->content = View::forge('access/edit');

	}

	public function action_delete($id = null)
	{
		if ($access = Model_Access::find_one_by_id($id))
		{
			$access->delete();

			Session::set_flash('success', 'Deleted access #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete access #'.$id);
		}

		Response::redirect('access');

	}


}
