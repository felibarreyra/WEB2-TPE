<?php
    require_once'app/models/model.db.php';


    class ProductModel extends Model{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        }

        public function getProducts(){
            $query=$this->db->prepare('SELECT * FROM products');
            $query->execute();
            $products=$query->fetchAll(PDO::FETCH_OBJ);
            return $products;
        }

        public function getProduct($id){
            $query=$this->db->prepare('SELECT * FROM products WHERE id=?');
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function orderByPrecioDes(){
            $query=$this->db->prepare('SELECT * FROM productos ORDER BY price DESC;');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function insertProduct($name,$description,$price){
            $query=$this->db->prepare('INSERT INTO products (name, description, price)VALUES (?,?,?)');
            $query->execute([$name,$description,$price]);
            return $this->db->lastInsertId();
        }

        public function updateProduct($id,$name,$description,$price){
            $query=$this->db->prepare('UPDATE products SET name=?, description=?, price=? WHERE id=?');
            $query->execute([$id,$name,$description,$price]);
        }
    }