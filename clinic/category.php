<?php
    require_once('support/init.php');           // Adiciona configurações gerais
    require_once('support/sessionControl.php'); // Adiciona configurações de sessão
	require_once('support/dbConfig.php');       // Conecta com a base de dados
    require_once('database/db_category.php');   // Adiciona funções relacionadas a categoria de equipamentos
    require_once('database/db_user.php');       // Adiciona funções relacionadas ao utilizador
    require_once('database/db_equipment.php');  // Adiciona funções relacionadas ao equipamento
    
    if(isset($_SESSION['changePass']))
		die(header('location: ' . SITE_ROOT . 'password_edit.php'));
    
    // Consultas necessárias
    $nomeUtilizador = getUserNameByRegistry($_SESSION['utilizadorLogado']);
    $listaCategorias  = listCategory();
    $userId = getUserIdByRegistry($_SESSION['utilizadorLogado']);
    $listaEquipamentos = listAllowedEquipment($userId);
    
    // Monta página
    $titulo_pagina  = "Categoria de equipamentos";
    include('templates/tpl_head.php');
    include('templates/tpl_header.php');
    include('templates/tpl_category_list.php');
    include('templates/tpl_footer.php');
?>