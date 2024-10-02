<?php if (isset($menuTabla) && count($menuTabla)): ?>
    <ul class="nav nav-pills nav-stacked list-group sidebar-nav-v1" id="sidebar-nav">
        <?php $numFilas = count($menuTabla); ?>
        <?php $esSubmenu = false; ?>
        <?php for ($i = 0; $i < $numFilas; $i++): ?>
            <?php if ($menuTabla[$i]['tipo'] == 0 && $numFilas != $i + 1 && $menuTabla[$i + 1]['tipo'] == 1): ?>
                <?php $esSubmenu = true; ?>
                <li class="list-group-item list-toggle" style="border:none; border-bottom: 1px solid #DDDEDF;">
                    <a data-toggle="collapse" data-parent="#sidebar-nav" href="<?php echo ((isset($menuTabla[$i]['href'])) ? $menuTabla[$i]['href'] : "-"); ?>" class="collapsed text-menu" aria-expanded="false"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php echo ((isset($menuTabla[$i]['nombre'])) ? $menuTabla[$i]['nombre'] : "-"); ?></a>
                    <ul id="collapse-<?php echo ((isset($menuTabla[$i]['id'])) ? $menuTabla[$i]['id'] : "-"); ?>" class="collapse" aria-expanded="false" >  
                        <?php while ($esSubmenu): ?>
                            <?php if ($menuTabla[$i]['tipo'] != 0): ?>
                                <li style="border:none;"><a href="/universidad/rectoria/<?php echo ((isset($menuTabla[$i]['href'])) ? $menuTabla[$i]['href'] : "-"); ?>" class="text-submenu" style="border:none; border-bottom: 1px solid #DDDEDF;"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo ((isset($menuTabla[$i]['nombre'])) ? $menuTabla[$i]['nombre'] : "-"); ?></a></li>
                            <?php endif; ?>
                            <?php $i++; ?>
                            <?php if ($numFilas == $i || $menuTabla[$i]['tipo'] == 0): ?>
                                <?php
                                $esSubmenu = false;
                                $i--;
                                ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                </li>
            <?php else: ?>
                <li class="list-group-item" style="border:none; border-bottom: 1px solid #DDDEDF;"><a href="/universidad/rectoria/<?php echo ((isset($menuTabla[$i]['href'])) ? $menuTabla[$i]['href'] : "-"); ?>" class="text-menu"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php echo ((isset($menuTabla[$i]['nombre'])) ? $menuTabla[$i]['nombre'] : "-"); ?></a></li>
                <?php endif; ?>   
            <?php endfor; ?>
    </ul>
<?php endif; ?>