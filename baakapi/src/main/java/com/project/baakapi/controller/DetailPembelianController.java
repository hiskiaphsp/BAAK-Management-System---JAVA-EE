package com.project.baakapi.controller;

import com.project.baakapi.model.DetailPembelian;
import com.project.baakapi.service.DetailPembelianService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/detail-pembelian")
public class DetailPembelianController {

    @Autowired
    private DetailPembelianService detailPembelianService;

    @GetMapping("/{id}")
    public ResponseEntity<DetailPembelian> getDetailPembelianById(@PathVariable Long id) {
        DetailPembelian detailPembelian = detailPembelianService.getById(id);
        if (detailPembelian != null) {
            return new ResponseEntity<>(detailPembelian, HttpStatus.OK);
        } else {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }

    @GetMapping
    public ResponseEntity<List<DetailPembelian>> getAllDetailPembelian() {
        List<DetailPembelian> detailPembelianList = detailPembelianService.getAllDetailPembelian();
        return new ResponseEntity<>(detailPembelianList, HttpStatus.OK);
    }

    @PostMapping
    public ResponseEntity<DetailPembelian> createDetailPembelian(@RequestBody DetailPembelian detailPembelian) {
        DetailPembelian createdDetailPembelian = detailPembelianService.createDetailPembelian(detailPembelian);
        return new ResponseEntity<>(createdDetailPembelian, HttpStatus.CREATED);
    }

    @PutMapping("/{id}")
    public ResponseEntity<DetailPembelian> updateDetailPembelian(@PathVariable Long id, @RequestBody DetailPembelian updatedDetailPembelian) {
        DetailPembelian detailPembelian = detailPembelianService.updateDetailPembelian(id, updatedDetailPembelian);
        if (detailPembelian != null) {
            return new ResponseEntity<>(detailPembelian, HttpStatus.OK);
        } else {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteDetailPembelian(@PathVariable Long id) {
        detailPembelianService.deleteDetailPembelian(id);
        return new ResponseEntity<>(HttpStatus.NO_CONTENT);
    }
}
