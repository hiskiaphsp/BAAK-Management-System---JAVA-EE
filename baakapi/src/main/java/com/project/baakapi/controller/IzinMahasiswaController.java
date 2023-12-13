package com.project.baakapi.controller;

import com.project.baakapi.model.IzinMahasiswa;
import com.project.baakapi.service.IzinMahasiswaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/api/izin-mahasiswa")
public class IzinMahasiswaController {

    @Autowired
    private IzinMahasiswaService izinMahasiswaService;

    @GetMapping("/{id}")
    public ResponseEntity<IzinMahasiswa> getIzinMahasiswaById(@PathVariable Long id) {
        Optional<IzinMahasiswa> izinMahasiswa = izinMahasiswaService.getIzinMahasiswaById(id);
        return izinMahasiswa.map(value -> new ResponseEntity<>(value, HttpStatus.OK))
                .orElseGet(() -> new ResponseEntity<>(HttpStatus.NOT_FOUND));
    }

    @GetMapping
    public ResponseEntity<List<IzinMahasiswa>> getAllIzinMahasiswa() {
        List<IzinMahasiswa> izinMahasiswaList = izinMahasiswaService.getAllIzinMahasiswa();
        return new ResponseEntity<>(izinMahasiswaList, HttpStatus.OK);
    }

    @PostMapping
    public ResponseEntity<IzinMahasiswa> createIzinMahasiswa(@RequestBody IzinMahasiswa izinMahasiswa) {
        IzinMahasiswa createdIzinMahasiswa = izinMahasiswaService.createIzinMahasiswa(izinMahasiswa);
        return new ResponseEntity<>(createdIzinMahasiswa, HttpStatus.CREATED);
    }

    @PutMapping("/{id}")
    public ResponseEntity<IzinMahasiswa> updateIzinMahasiswa(@PathVariable Long id, @RequestBody IzinMahasiswa updatedIzinMahasiswa) {
        Optional<IzinMahasiswa> izinMahasiswa = izinMahasiswaService.updateIzinMahasiswa(id, updatedIzinMahasiswa);
        return izinMahasiswa.map(value -> new ResponseEntity<>(value, HttpStatus.OK))
                .orElseGet(() -> new ResponseEntity<>(HttpStatus.NOT_FOUND));
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteIzinMahasiswa(@PathVariable Long id) {
        boolean isDeleted = izinMahasiswaService.deleteIzinMahasiswa(id);
        return isDeleted ? new ResponseEntity<>(HttpStatus.NO_CONTENT) : new ResponseEntity<>(HttpStatus.NOT_FOUND);
    }
}
