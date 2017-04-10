<?php echo $this->ajax_pagination->create_links(); ?>

<script>
function Approved(butId){
    $.ajax({
          method: "POST",
          url: base_url+"index.php/modulonline/tambahdownload/"+butId,
          data: { rowid: butId },
          dataType:"text",
          success:function(data){
              // alert(data);
          },
          error:function (data){
              // alert("failed");
          }
    });
}
</script>