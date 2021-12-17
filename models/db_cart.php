<?php
//class: query to get Products
class Cart extends Db
{
    //get cart by id_user
    public function getCartByIIDUser($id_user)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM cart WHERE id_user = ?");
        $sql->bind_param("i",$id_user);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    //count Element number of cart
    public function countCart()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT COUNT(*) FROM cart");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    //Insert data to table cart in database
    public function addProduct($id_product,$id_size,$id_topping,$quantity, $id_user)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `cart` (`id_product`, `id_size`, `id_topping`, `quantity`, `id_user`) VALUES (?,?,?,?,?)");
        $sql->bind_param("iiiii", $id_product,$id_size,$id_topping,$quantity, $id_user);
        return $sql->execute();
    }
    //Remove a product inside table cart in database
    public function removeProduct($id_product)
    {
        //Quyery
        $sql = self::$connection->prepare("DELETE FROM `cart` WHERE id_product =?");
        $sql->bind_param("i", $id_product);
        return $sql->execute();
    }

    //Remove a product inside table cart in database
    public function removeAllProducts()
    {
        //Quyery
        $sql = self::$connection->prepare("DELETE FROM `cart`");
        return $sql->execute();
    }

    //Update data from table cart in database
    public function updateProduct($id_size, $id_topping, $quantity, $id_product)
    {
        //Quyery
        $sql = self::$connection->prepare("UPDATE `cart` SET `id_size` = ?, `id_topping` = ?, `quantity` = ? WHERE `cart`.`id_product` = ?");
        $sql->bind_param("iiii", $id_size, $id_topping, $quantity, $id_product);
        return $sql->execute();
    }
}
?>