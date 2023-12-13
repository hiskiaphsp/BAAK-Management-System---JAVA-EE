package com.project.baakapi.service;

import com.project.baakapi.model.IzinMahasiswa;
import com.project.baakapi.repository.IzinMahasiswaRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.util.List;
import java.util.Optional;

@Service
public class IzinMahasiswaService {

    private final IzinMahasiswaRepository izinMahasiswaRepository;

    @Autowired
    public IzinMahasiswaService(IzinMahasiswaRepository izinMahasiswaRepository) {
        this.izinMahasiswaRepository = izinMahasiswaRepository;
    }

    public List<IzinMahasiswa> getAllIzinMahasiswa() {
        return izinMahasiswaRepository.findAll();
    }

    public Optional<IzinMahasiswa> getIzinMahasiswaById(Long id) {
        return izinMahasiswaRepository.findById(id);
    }

    public IzinMahasiswa createIzinMahasiswa(IzinMahasiswa izinMahasiswa) {
        // Lakukan validasi atau operasi lain jika diperlukan sebelum menyimpan
        izinMahasiswa.setCreatedAt(new Date());
        izinMahasiswa.setUpdatedAt(new Date());
        return izinMahasiswaRepository.save(izinMahasiswa);
    }

    public Optional<IzinMahasiswa> updateIzinMahasiswa(Long id, IzinMahasiswa updatedIzinMahasiswa) {
        // Periksa apakah izinMahasiswa dengan id tersebut ada
        Optional<IzinMahasiswa> existingIzinMahasiswa = izinMahasiswaRepository.findById(id);

        if (existingIzinMahasiswa.isPresent()) {
            // Lakukan validasi atau operasi lain jika diperlukan sebelum mengupdate
            IzinMahasiswa izinMahasiswaToUpdate = existingIzinMahasiswa.get();
            izinMahasiswaToUpdate.setJenis(updatedIzinMahasiswa.getJenis());
            izinMahasiswaToUpdate.setWaktuMulai(updatedIzinMahasiswa.getWaktuMulai());
            izinMahasiswaToUpdate.setWaktuSelesai(updatedIzinMahasiswa.getWaktuSelesai());
            izinMahasiswaToUpdate.setStatus(updatedIzinMahasiswa.getStatus());
            izinMahasiswaToUpdate.setUpdatedAt(new Date());

            // Simpan izinMahasiswa yang sudah diupdate
            return Optional.of(izinMahasiswaRepository.save(izinMahasiswaToUpdate));
        } else {
            return Optional.empty(); // IzinMahasiswa dengan id tersebut tidak ditemukan
        }
    }

    public boolean deleteIzinMahasiswa(Long id) {
        // Periksa apakah izinMahasiswa dengan id tersebut ada
        Optional<IzinMahasiswa> existingIzinMahasiswa = izinMahasiswaRepository.findById(id);

        if (existingIzinMahasiswa.isPresent()) {
            // Hapus izinMahasiswa
            izinMahasiswaRepository.deleteById(id);
            return true;
        } else {
            return false; // IzinMahasiswa dengan id tersebut tidak ditemukan
        }
    }
}
