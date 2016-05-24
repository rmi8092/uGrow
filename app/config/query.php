<?php
	//Todas las consultas de la aplicación
	define("INSERTAR_USUARIO", "INSERT INTO users (user, pass, name, lastname, mail, birthdate, trades, rating, picture, description, location, register) VALUES (:user, :password, :name, :lastname, :email, :birthdate, :trades, :rating, :picture, :description, :location, :register)");
	define("TODOS_USUARIOS_USER", "SELECT user FROM users");
	define("GET_USER_USERNAME", "SELECT * FROM users WHERE user = :user");
	define("MODIFY_USER", "UPDATE users SET user = :new_user, pass = :password, name = :name, lastname = :lastname, mail = :email, birthdate = :birthdate, description = :description, location = :location WHERE user = :user")
?>