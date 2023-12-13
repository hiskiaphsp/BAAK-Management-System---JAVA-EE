package com.project.baakapi.controller;

import com.project.baakapi.model.Ruangan;
import com.project.baakapi.service.RuanganService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/api/ruangan")
public class RuanganController {

    private final RuanganService ruanganService;

    @Autowired
    public RuanganController(RuanganService ruanganService) {
        this.ruanganService = ruanganService;
    }

    @GetMapping
    public List<Ruangan> getAllRuangan() {
        return ruanganService.getAllRuangan();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Ruangan> getRuanganById(@PathVariable Long id) {
        Optional<Ruangan> ruangan = ruanganService.getRuanganById(id);
        return ruangan.map(ResponseEntity::ok).orElseGet(() -> ResponseEntity.notFound().build());
    }

    @PostMapping
    public ResponseEntity<Ruangan> createRuangan(@RequestBody Ruangan ruangan) {
        Ruangan createdRuangan = ruanganService.createRuangan(ruangan);
        return ResponseEntity.ok(createdRuangan);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Ruangan> updateRuangan(@PathVariable Long id, @RequestBody Ruangan updatedRuangan) {
        Ruangan updatedEntity = ruanganService.updateRuangan(id, updatedRuangan);
        return updatedEntity != null ? ResponseEntity.ok(updatedEntity) : ResponseEntity.notFound().build();
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteRuangan(@PathVariable Long id) {
        boolean deleted = ruanganService.deleteRuangan(id);
        return deleted ? ResponseEntity.noContent().build() : ResponseEntity.notFound().build();
    }
}