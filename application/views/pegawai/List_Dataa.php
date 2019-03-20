<?php
  $no = 1;
  foreach ($dataPegawai as $pegawai) {
    ?>
    <tr>

      <td><?php echo $no; ?></td>
      <td style="min-width:100px;"><?php echo $pegawai->nama; ?></td>
      <td style="min-width:70px;"><?php echo $pegawai->email; ?></td>
      <td><?php echo $pegawai->divisi; ?></td>
      <td style="min-width:70px;"><?php echo $pegawai->nohp; ?></td>
      <td><?php echo $pegawai->ext; ?></td>
      <td><?php echo $pegawai->status_id; ?></td>
      <td><?php echo $pegawai->input; ?></td>
      <td><?php echo $pegawai->upd; ?></td>
      <td><?php echo $pegawai->id_lokasi; ?></td>
      <td class="text-center" style="min-width:230px;">
       
        <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $pegawai->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
       
        <button class="btn btn-danger konfirmasiHapus-tb_contact" data-id="<?php echo $pegawai->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>