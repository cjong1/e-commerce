<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {
     function get_all()
     {
         return $this->db->query("SELECT * FROM products")->result_array();
     }
     function get_data($id)
     {
        $product_ids = array();
        foreach($id as $key=> $value) 
        {
            if(is_numeric($key))
                $product_ids[] = $key;
        }
      
        return $this->db->query("SELECT * FROM products WHERE id IN (".implode(",", $product_ids).")")->result_array();
       
     }
     function add($product)
     {
         $query_customer= "INSERT INTO customers (name, address, credit_card, created_at) VALUES (?,?,?,NOW())";
         $query_orders= "INSERT INTO orders (description, price,quantity,created_at) VALUES (?,?,?,NOW())";
         $values_customer = array($product['name'], $product['address'],$product['credit_card']); 
         $values_orders = array($product['description'], $prodcut['price'], $product['quantity']);

         $this->db->query($query_customer, $values_customer);
         $this->db->query($query_orders, $values_orders);
         
     }
     function update($id,$quantity) 
     {
        $query = "UPDATE products SET quantity=$quantity WHERE id=$id";
        $this->db->query($query);
     }
     function quantity()
     {
        $query = "SELECT SUM(products.quantity) as total FROM products";
        return $this->db->query($query)->row_array();
     }

     function destroy($id) 
     {
        $query = "DELETE FROM products WHERE id=?";
        return $this->db->query($query,array($id));
     }
}