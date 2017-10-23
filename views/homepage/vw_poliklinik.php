<table>
        <thead>
          <tr>
              <th>Kode klinik</th>
              <th>Nama klinik</th>

          </tr>
        </thead>
        <?php foreach ($read_data as $v): ?>
          <tr>
            <td><?php echo $v->kode_plk; ?></td>
            <td><a href="<?php echo site_url('dashboard/poliklinik/'.$v->kode_plk); ?>"><?php echo $v->nama_plk; ?></a></td>
          </tr>
        <?php endforeach; ?>
        <tbody>

        </tbody>
      </table>
