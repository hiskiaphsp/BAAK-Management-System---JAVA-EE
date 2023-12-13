package com.project.baakapi.service;

import com.project.baakapi.model.DetailPembelian;
import com.project.baakapi.repository.DetailPembelianRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.util.List;

@Service
public class DetailPembelianService {

    @Autowired
    private DetailPembelianRepository detailPembelianRepository;

    public DetailPembelian getById(Long id) {
        return detailPembelianRepository.findById(id).orElse(null);
    }

    public List<DetailPembelian> getAllDetailPembelian() {
        return detailPembelianRepository.findAll();
    }

    public DetailPembelian createDetailPembelian(DetailPembelian detailPembelian) {
        // Lakukan validasi atau logika bisnis jika diperlukan
        detailPembelian.setCreatedAt(new Date());
        detailPembelian.setUpdatedAt(new Date());
        return detailPembelianRepository.save(detailPembelian);
    }

    public DetailPembelian updateDetailPembelian(Long id, DetailPembelian updatedDetailPembelian) {
        DetailPembelian existingDetailPembelian = detailPembelianRepository.findById(id).orElse(null);
        if (existingDetailPembelian != null) {
            // Lakukan validasi atau logika bisnis jika diperlukan
            existingDetailPembelian.setPembelian(updatedDetailPembelian.getPembelian());
            existingDetailPembelian.setProduct(updatedDetailPembelian.getProduct());
            existingDetailPembelian.setJumlah(updatedDetailPembelian.getJumlah());
            existingDetailPembelian.setTotalHarga(updatedDetailPembelian.getTotalHarga());
            // Set atribut lain sesuai kebutuhan

            existingDetailPembelian.setUpdatedAt(new Date()); // Update waktu pembaruan
            return detailPembelianRepository.save(existingDetailPembelian);
        } else {
            return null; // DetailPembelian dengan ID tersebut tidak ditemukan
        }
    }

    public void deleteDetailPembelian(Long id) {
        detailPembelianRepository.deleteById(id);
    }
}
