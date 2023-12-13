package com.project.baakapi.service;

import com.project.baakapi.model.Pembelian;
import com.project.baakapi.repository.PembelianRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.math.BigDecimal;
import java.util.Date;
import java.util.List;

@Service
public class PembelianService {

    @Autowired
    private PembelianRepository pembelianRepository;

    public Pembelian getById(Long id) {
        return pembelianRepository.findById(id).orElse(null);
    }

    public List<Pembelian> getAllPembelian() {
        return pembelianRepository.findAll();
    }

    public Pembelian createPembelian(Pembelian pembelian) {
        // Lakukan validasi atau logika bisnis jika diperlukan
        pembelian.setCreatedAt(new Date());
        pembelian.setUpdatedAt(new Date());
        return pembelianRepository.save(pembelian);
    }

    public Pembelian updatePembelian(Long id, Pembelian updatedPembelian) {
        Pembelian existingPembelian = pembelianRepository.findById(id).orElse(null);
        if (existingPembelian != null) {
            // Lakukan validasi atau logika bisnis jika diperlukan
            existingPembelian.setUser(updatedPembelian.getUser());
            existingPembelian.setTotalHarga(updatedPembelian.getTotalHarga());
            existingPembelian.setStatusPembayaran(updatedPembelian.getStatusPembayaran());
            // Set atribut lain sesuai kebutuhan

            existingPembelian.setUpdatedAt(new Date()); // Update waktu pembaruan
            return pembelianRepository.save(existingPembelian);
        } else {
            return null; // Pembelian dengan ID tersebut tidak ditemukan
        }
    }

    public void deletePembelian(Long id) {
        pembelianRepository.deleteById(id);
    }
}
