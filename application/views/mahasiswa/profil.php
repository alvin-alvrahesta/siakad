<div class="container-fluid">
	<h1>Profil MHS checkk</h1>
	<table class="table table-striped table-hover">
					<tr>
						<th width="170px">NIM</th>
						<th width="20px">:</th>
						<th> <?=$profil->userpass; ?> </th>
					</tr>
					<tr>
						<th width="170px">Nama Mahasiswa</th>
						<th width="20px">:</th>
						<td> <?=$profil->username; ?> </td>
					</tr>
					<tr>
						<th width="170px">Beban Mata Kuliah</th>
						<th width="20px">:</th>
						<!-- <td> <?= $this->db->from("mahasiswa")->where("nim",$profil->userid)->count_all_results() ?> </td> -->
					</tr>
			</table>
</div>
