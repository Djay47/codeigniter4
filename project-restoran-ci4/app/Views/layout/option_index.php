<table class="table table-borderless align-middle table-sm w-25 my-2">
	<form action="<?= base_url('admin/menu/select') ?>" method="get">
		<tr>
			<td>
				<select name="idkategori" id="idkategori" onchange="this.form.submit()">
					<option selected>Pilih Kategori</option>
					<?php foreach ($kategori as $key => $ktgr) : ?>
						<option value="<?= $ktgr["idkategori"] ?>"><?= $ktgr["kategori"] ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
	</form>
</table>