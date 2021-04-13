<?php 
    function get_classes() {
        global $db;
        $query = 'SELECT * FROM class ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    function get_class_name($class_id) {
        global $db;
        $query = 'SELECT * FROM class WHERE ID = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        $class_name = $class['Class'];
        return $class_name;
    }

    function delete_class($class_id) {
        global $db;
        $query = 'DELETE FROM class WHERE ID = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_class($class_name) {
        global $db;
        $query = 'INSERT INTO class (Class)
              VALUES
                 (:className)';
        $statement = $db->prepare($query);
        $statement->bindValue(':className', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }