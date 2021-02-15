<?php 
class AppSchema extends CakeSchema {

	// App::uses('Post', 'Model');

	public $connection = 'default';

	public function before($event = array()) {
		// flush the database cache after each table is created
		$db = ConnectionManager::getDataSource($this->connection);
	    $db->cacheSources = false;
	    return true;
	}

	public function after($event = array()) {
		// To create the dummy posts, after creating the posts table
		if (isset($event['create'])) {
        switch ($event['create']) {
            case 'posts':
                App::uses('ClassRegistry', 'Utility');
                $post = ClassRegistry::init('Post');
                $post->create();
                $post->save(
                    array('Post' =>
                        array('title' => 'CakePHP Schema Files')
                    )
                );
                break;
        	}
    	}
	}

	public $posts = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'body' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

}
