package com.project.baakapi.service;

import com.project.baakapi.model.Ruangan;
import com.project.baakapi.repository.RuanganRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.util.List;
import java.util.Optional;

@Service
public class RuanganService {

    private final RuanganRepository ruanganRepository;

    @Autowired
    public RuanganService(RuanganRepository ruanganRepository) {
        this.ruanganRepository = ruanganRepository;
    }

    public List<Ruangan> getAllRuangan() {
        return ruanganRepository.findAll();
    }

    public Optional<Ruangan> getRuanganById(Long id) {
        return ruanganRepository.findById(id);
    }

    public Ruangan createRuangan(Ruangan ruangan) {
        ruangan.setCreatedAt(new Date());
        ruangan.setUpdatedAt(new Date());
        return ruanganRepository.save(ruangan);
    }

    public Ruangan updateRuangan(Long id, Ruangan updatedRuangan) {
        return ruanganRepository.findById(id)
                .map(existingRuangan -> {
                    existingRuangan.setNamaRuangan(updatedRuangan.getNamaRuangan());
                    existingRuangan.setStatus(updatedRuangan.getStatus());
                    existingRuangan.setUpdatedAt(new Date());
                    return ruanganRepository.save(existingRuangan);
                })
                .orElse(null);
    }

    public boolean deleteRuangan(Long id) {
        if (ruanganRepository.existsById(id)) {
            ruanganRepository.deleteById(id);
            return true;
        }
        return false;
    }
}
