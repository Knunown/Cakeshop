<div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Menu & Giá</h2>
                <h1 class="display-4 text-uppercase">Danh sách bánh ngọt</h1>
            </div>
            <div class="tab-class text-center">
                <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase border-inner p-4 mb-5">
                    <?php 
                        $data = new cakes_data();
                        $bool = true;
                        $cakestype = $data -> select_cake_type();
                        foreach ($cakestype as $i)
                        {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link text-white <?php if($bool) echo('active')?>" data-bs-toggle="pill" href="#tab-<?php echo($i['ct_index'])?>"><?php echo($i['ct_name'])?></a>
                                
                            </li>
                            <?php
                            $bool = false;
                        }
                    ?>
                    
                </ul>
                <div class="tab-content">
                    <?php
                        $bool = true;
                        foreach ($cakestype as $i)
                        {
                            $cakes = $data -> select_cake_by_type($i['ct_index']);
                            
                            ?>
                            <div id="tab-<?php echo($i['ct_index'])?>" class="tab-pane fade show p-0 <?php if($bool) echo('active')?>">
                                <?php
                                    if(mysqli_num_rows($cakes) == 0){
                                        echo'<p>Hết hàng</p>';
                                    }
                                    else{
                                        
                                ?>
                                <div class="row g-3">
                                    <?php 
                                        foreach ($cakes as $j)
                                        {
                                    ?>
                                    
                                    <div class="col-lg-6 " >
                                        <a href="product_content.php?id=<?php echo $j['c_index']?>">
                                        <div class="d-flex h-100">
                                            <div class="flex-shrink-0">
                                                <img  class="img-fluid" src="upload/<?php echo $j['c_image']?>" alt="" style="width: 150px; height: 85px;object-fit:cover;">
                                                <h4 class="bg-dark text-primary p-2 m-0"><?php echo $j['c_price']?>₫</h4>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4 da_name" style="width:100%;">
                                                <h5 class="text-uppercase" style=""><?php echo $j['c_name']?></h5>
                                                <span style="flex-wrap: wrap;word-break: break-word;"><?php echo $j['c_short_description']?></span>
                                                <!-- <p style="margin-bottom:0;color:gray">Số lượng</p> -->
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    
                                    <?php
                                        }
                                    ?>
                                </div>
                            <?php
                                        
                                }
                            ?>
                            </div>
                            <?php
                            $bool = false;
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>