<?php
/* 
 * *****************************************************************************
 * Filename  : kalender.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
echo "<div class='row'>
              <div class='col-lg-12'>
                <div class='box'>
                  <header>
                  <div class='icons'>
                      <i class='fa fa-calendar'></i>
                    </div>
                    <h5>Kalender Tahun ".date("Y")."</h5>
                        <div class='toolbar'>
                      <nav style='padding: 8px;'>
                        <a href='javascript:;' class='btn btn-default btn-sm collapse-box'>
                          <i class='fa fa-minus'></i>
                        </a> 
                        <a href='javascript:;' class='btn btn-default btn-sm full-box'>
                          <i class='fa fa-expand'></i>
                        </a> 
                        <a href='javascript:;' class='btn btn-danger btn-sm close-box'>
                          <i class='fa fa-times'></i>
                        </a> 
                      </nav>
                    </div>
                  </header>
                  <div id='calendar_content' class='body'>
                    <div id='calendar'></div>
                </div>
              </div>
      </div>";
/*
 * end of kalender
 */