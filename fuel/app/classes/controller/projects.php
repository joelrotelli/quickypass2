<?php
class Controller_Projects extends Controller_Template{

	public function action_index()
	{
		$data['projects'] = Model_Project::find_all();
		$this->template->title = "Projects";
		$this->template->content = View::forge('projects/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('projects');

		$data['project'] = Model_Project::find_by_pk($id);

		$this->template->title = "Project";
		$this->template->content = View::forge('projects/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Project::validate('create');
			
			if ($val->run())
			{
				$project = Model_Project::forge(array(
					'name' => Input::post('name'),
					'client_id' => Input::post('client_id'),
				));

				if ($project and $project->save())
				{
					Session::set_flash('success', 'Added project #'.$project->id.'.');
					Response::redirect('projects');
				}
				else
				{
					Session::set_flash('error', 'Could not save project.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Projects";
		$this->template->content = View::forge('projects/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('projects');

		$project = Model_Project::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Project::validate('edit');

			if ($val->run())
			{
				$project->name = Input::post('name');
				$project->client_id = Input::post('client_id');

				if ($project->save())
				{
					Session::set_flash('success', 'Updated project #'.$id);
					Response::redirect('projects');
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

		$this->template->set_global('project', $project, false);
		$this->template->title = "Projects";
		$this->template->content = View::forge('projects/edit');

	}

	public function action_delete($id = null)
	{
		if ($project = Model_Project::find_one_by_id($id))
		{
			$project->delete();

			Session::set_flash('success', 'Deleted project #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete project #'.$id);
		}

		Response::redirect('projects');

	}


}
