<?php
spl_autoload_register(function ($cl) {
    include $cl . 'class.php';
});

class NewsDB implements INewsDB
{
    const DB_NAME = 'news.db';
    private $_db;
    function __get ($name) {
        if($name == 'db'){
            return $this->_db;
        }
    }

    function __construct() {
        if(!is_file('news.db')){
            $this->_db = new SQLite3(self::DB_NAME);
            $this->_db->query("CREATE TABLE msgs(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                category INTEGER,
                description TEXT,
                source TEXT,
                datetime INTEGER
                )");
            $this->_db->query("CREATE TABLE category(
                id INTEGER,
                name TEXT
            )");
            $this->_db->query("INSERT INTO category(id, name)
            SELECT 1 as id, 'Политика' as name
            UNION SELECT 2 as id, 'Культура' as name
            UNION SELECT 3 as id, 'Спорт' as name ");
        }
    }
    
    function __destruct () {
        if(!is_file('news.db')){
            $this->_db->close();
        }
    }
    function saveNews($title, $category, $description, $source){
        $dt = date("Y-m-d H:i:s");
        if($title != '' && $category != '' && $description != '' && $source != ''){
            $this->_db->query("INSERT INTO msgs(title, category, description, source, datetime) VALUES ('$title', '$category', '$description', '$source', '$dt')");
        }
    }
    function getNews(){
        return 1;
    }
    function showNews($id){
        return 1;
    }
}
