<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Siswa extends CI_Model
{

	public $nama_siswa;
	public $alamat_siswa;
	protected $table = "tbl_siswa";

	function simpan_siswa($nama, $alamat)
	{
		$this->nama_siswa    = $nama;
		$this->alamat_siswa  = $alamat;

		return $this->db->insert($this->table, $this);
	}

	function get_all_siswa()
	{
		return $this->db->get($this->table)->result();
	}

	function delete_siswa($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}

	function update_siswa($array, $id)
	{
		$this->db->set($array);
		$this->db->where('id', $id);
		return $this->db->update($this->table);
	}

	function get_siswa($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->result();
	}
}
