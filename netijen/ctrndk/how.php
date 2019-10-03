<?php include "app/header.php"; ?>

<div class="card mb-4 box-shadow">
  <div class="card-header">
    <h5 class="card-title"><i class="fa fa-book"></i> Guide</h5>
  </div>
  <div class="card-body">
    <div class="panel-group" id="faqAccordion">
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                 <h4 class="panel-title">
                    <a href="#" class="ing">1. Home</a>
              </h4>

            </div>
            <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary"><i class="fa fa-info-circle"></i> Home Menu</span></h5>

                    <p>Input keyword and click search. <img src="img/home.png">
                        </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                 <h4 class="panel-title">
                    <a href="#" class="ing">2. Datatables </a>
              </h4>

            </div>
            <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary"><i class="fa fa-info-circle"></i> Datatables Menu</span></h5>

                    <p>Alumni Datatables from Database. <img src="img/dtables.png"></p>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                 <h4 class="panel-title">
                    <a href="#" class="ing">3. Add Data</a>
              </h4>

            </div>
            <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary"><i class="fa fa-info-circle"></i> Add Data Menu</span></h5>

                    <p>You can Add Data in this menu.  <img src="img/add.png"></p>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                 <h4 class="panel-title">
                    <a href="#" class="ing">4. Crew</a>
              </h4>

            </div>
            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary"><i class="fa fa-info-circle"></i> Crew Menu</span></h5>

                    <p>In this menu, you can show all about developers. <img src="img/crew.png"> </p>
                </div>
            </div>
  </div>
</div>

<?php include "app/footer.php"; ?>