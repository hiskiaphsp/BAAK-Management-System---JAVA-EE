package com.project.baakapi.controller;

import com.project.baakapi.model.Pembelian;
import com.project.baakapi.service.PembelianService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/pembelian")
public class PembelianController {

    @Autowired
    private PembelianService pembelianService;

    @GetMapping("/{id}")
    public ResponseEntity<Pembelian> getPembelianById(@PathVariable Long id) {
        Pembelian pembelian = pembelianService.getById(id);
        if (pembelian != null) {
            return new ResponseEntity<>(pembelian, HttpStatus.OK);
        } else {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }

    @GetMapping
    public ResponseEntity<List<Pembelian>> getAllPembelian() {
        List<Pembelian> pembelianList = pembelianService.getAllPembelian();
        return new ResponseEntity<>(pembelianList, HttpStatus.OK);
    }

    @PostMapping
    public ResponseEntity<Pembelian> createPembelian(@RequestBody Pembelian pembelian) {
        Pembelian createdPembelian = pembelianService.createPembelian(pembelian);
        return new ResponseEntity<>(createdPembelian, HttpStatus.CREATED);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Pembelian> updatePembelian(@PathVariable Long id, @RequestBody Pembelian updatedPembelian) {
        Pembelian pembelian = pembelianService.updatePembelian(id, updatedPembelian);
        if (pembelian != null) {
            return new ResponseEntity<>(pembelian, HttpStatus.OK);
        } else {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deletePembelian(@PathVariable Long id) {
        pembelianService.deletePembelian(id);
        return new ResponseEntity<>(HttpStatus.NO_CONTENT);
    }
}
