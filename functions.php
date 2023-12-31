<?php
require_once 'db.php';
function register($login, $password, $repeatPassword)
{
    if ($password != $repeatPassword) {
        return false;
    }
    $users = select('SELECT * FROM users WHERE login = :login', ['login' => $login]);
    if (!empty($users)) {
        return false;
    }
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $user_id = insert("INSERT INTO users (login,password) VALUES (:login, :password)", [
        'login' => $login,
        'password' => $hash,
    ]);
    return !empty($user_id);
}

function login($login, $password)
{
    $user = select('SELECT * FROM users WHERE login = :login', ['login' => $login]);
    if (!empty($user)) {
        return [
            'result' => password_verify($password, $user[0]['password']),
            'user' => $user[0]
        ];
    }
    return [
        'result' => false,
        'user' => null
    ];
}

function createProduct($title, $type_id, $rare, $price, $description, $file)
{
    $file_id = null;
    var_dump($file);
    if (!empty($file)) {
        $file_id = insert('INSERT INTO files (filename,type,content,size) VALUES (:filename,:type,:content,:size)', [
            'filename' => $file['name'],
            'type' => $file['type'],
            'content' => base64_encode(file_get_contents($file['tmp_name'])),
            'size' => $file['size'],
        ]);
    }
    $product_id = insert("INSERT INTO catalog (title, type_id, rare,price,description,file_id)
                            VALUES (:title, :type_id, :rare , :price, :description,:file_id)",
        [
            'title' => $title,
            'type_id' => $type_id,
            'rare' => $rare,
            'price' => $price,
            'description' => $description,
            'file_id' => $file_id,
        ]
    );
    return isset($product_id);
}

function createProductType($name)
{
    $product_type = insert("INSERT INTO type (name)
                            VALUES (:name)",
        [
            'name' => $name,
        ]
    );
    return isset($product_type);
}


function getProductTypes()
{
    $types = select('SELECT * FROM TYPE');
    return $types;
}


function getProductList()
{
    $list = select('SELECT title,description,id,price,file_id FROM catalog ORDER BY id');
    return $list;
}

function getProductById($product_id)
{
    $list = select('SELECT title,description,file_id,catalog.id ,price,rare,name as type FROM  catalog
left join type t on t.id = catalog.type_id where catalog.id=:id', [
        'id' => $product_id
    ]);
    return $list[0];
}
function getFileById($file_id)
{
    $list = select('SELECT * FROM FILES WHERE id = :id ', [
        'id' => $file_id
    ]);
    return 'data:'.$list [0]['type'].';base64,'.$list [0]['content'];
}





