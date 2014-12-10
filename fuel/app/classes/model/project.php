<?php
class Model_Project extends Model_Crud
{
	protected static $_table_name = 'projects';
  protected static $_belongs_to = array('client');
  public static $_has_many = array('accesses');

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('client_id', 'Client Id', 'required|valid_string[numeric]');

		return $val;
	}

}
