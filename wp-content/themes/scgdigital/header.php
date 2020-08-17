<?php

 //wp_nav_menu( array( 'theme_location' => 'primary-menu','container_class' => 'primary-menu' ) ); 
 wp_head();

?>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<?php 
 $menus = wp_get_menu_array('primary-menu');   
                   
?>


<nav class="navbar navbar-expand-md bg-dark navbar-dark mx-auto">
        <a class="navbar-brand" href="#">SCG Digital</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto mr-5">
               <?php foreach($menus as $menu)
               {
                 if(!empty($menu['children'])){
                ?>
                <li class="nav-item dropdown mr-3">
                   <a class="nav-link  text-white" href="<?php  echo $menu['url'];?>" id="navbardrop" data-toggle="dropdown">
                        <?php echo the_field("icon_class", $menu['ID']); ?><?php  echo $menu['title'];?>
                    </a>
                   
                    <div class="dropdown-menu">
                     <?php foreach($menu['children'] as $submenu){ ?>
                        <a class="dropdown-item" href="<?php echo $submenu['url'];?>"><?php echo $submenu['title'];?></a>
                        <?php } ?>
                    </div>
                    
                </li>
              <?php 
               
            }else{ ?>

                <li class="nav-item dropdown mr-3">
                   <a class="nav-link  text-white" href="<?php  echo $menu['url'];?>" id="navbardrop" >
                        <?php echo the_field("icon_class", $menu['ID']); ?><?php  echo $menu['title'];?>
                        
                    </a>
                   
                </li>
              <?php } } ?>
            
            </ul>
        </div>
    </nav>
<style>
/* logo & Footer CSS*/
.dummy-footer-text{
    line-height: 2px;
    font-size: 13px;
}
.footer-info{
    line-height: 6px;
    

}
.footer-wrap{
    background-color: black;
    padding-top: 17px;
}

.box{
    width: 100%;
    height: 90px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    background-color: gray;
    color: white;
}
.all-box{
    padding-bottom: 10px;
}


@media (min-width: 992px){

    .dummy-footer-text{
        line-height: 0px;
        font-size: 12px;
    }
    .footer-info{
        line-height: 0px;
        
    
    }

}
@media (min-width: 768px){

    .dummy-footer-text{
        line-height: 0px;
        font-size: 12px;
    }
    .footer-info{
        line-height: 0px;
        
    
    }

}
@media (max-width: 576px){

    .dummy-footer-text{
        line-height: 10px;
        font-size: 12px;
    }
    .footer-info{
        line-height: 10px;
        
    
    }
    .contact{
        line-height: 16px;
    }

}
.nestedBlock{
  background-color: gray;
}
.textwidget{
  width:100%;
}
</style>

<?php

?>