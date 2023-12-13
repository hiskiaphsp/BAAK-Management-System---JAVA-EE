package com.project.baakapi.repository;

import com.project.baakapi.model.RequestSurat;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface RequestSuratRepository extends JpaRepository<RequestSurat, Long> {
    // Tambahkan metode kustom jika diperlukan
}

