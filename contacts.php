<?php require 'header.php' ?>
<style>
.emaillist:hover {
background: #eef2f7!important;
cursor : pointer;

}
.font-weight-bold{
    font-weight: bold;
    }
.text-ll{
    color: #6c757d;
}
</style>
<div class="main-content">
    <section class="section">
        <h1 class="section-header">
        <div>Contacts</div>
        </h1>
    </section>
    <div class="card mt-3" id="mailfromcontact">
            
    </div>

    <div class="modal" id="preview">
    </div>
  
</div>


<?php require 'footer.php' ?>

<script> maildetails();</script>

