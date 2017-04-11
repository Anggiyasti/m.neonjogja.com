
  <?php if(!empty($posts)): foreach($posts as $post): ?>
  <div class="collection z-depth-1">
    <div class="collection-item">
      <div class="coba2">
        <span class="title-edu"><?= $post['judul']?></span>

        <?php if (current_url() == base_url().'index.php/modulonline/modulsd'): ?>
          <a href=""><span class="label label-primary">sd</span></a>
        <?php elseif (current_url() == base_url().'index.php/modulonline/modulsmp'): ?>
          <a href=""><span class="label label-primary">smp</span></a>
        <?php elseif (current_url() == base_url().'index.php/modulonline/modulsma'): ?>
          <a href=""><span class="label label-primary">sma</span></a>
        <?php elseif (current_url() == base_url().'index.php/modulonline/modulsmaipa'): ?>
          <a href=""><span class="label label-primary">sma ipa</span></a>
        <?php elseif (current_url() == base_url().'index.php/modulonline/modulsmaips'): ?>
          <a href=""><span class="label label-primary">sma ips</span></a>
        <?php else: ?>
        <?php endif ?>
        
        <!-- <a href=""><span class="label label-danger">SD</span></a> -->
      </div>
      
      <div class="coba">
        <span class="single-news-channeli "><?= $post['deskripsi'] ?></span> 
        
        <a href="<?= base_url("assetsnew/modul/".$post['url_file'])?>" class="secondary-content col s4" target="_blank" onclick="Approved('<?=$post['id']?>')"><i class="ion-ios-download-outline" ></i></a>
      </div>                
    </div>
  </div>

  <?php endforeach; else: ?>
  <?php endif; ?>
  <div class="clear"></div>
  <div class="right-align">
      <?php echo $this->ajax_pagination->create_links(); ?>
    </div>