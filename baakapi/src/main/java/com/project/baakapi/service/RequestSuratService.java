package com.project.baakapi.service;

import com.project.baakapi.model.RequestSurat;
import com.project.baakapi.repository.RequestSuratRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.util.List;
import java.util.Optional;

@Service
public class RequestSuratService {

    private final RequestSuratRepository requestSuratRepository;

    @Autowired
    public RequestSuratService(RequestSuratRepository requestSuratRepository) {
        this.requestSuratRepository = requestSuratRepository;
    }

    public List<RequestSurat> getAllRequestSurats() {
        return requestSuratRepository.findAll();
    }

    public Optional<RequestSurat> getRequestSuratById(Long id) {
        return requestSuratRepository.findById(id);
    }

    public RequestSurat createRequestSurat(RequestSurat requestSurat) {
        requestSurat.setCreatedAt(new Date());
        requestSurat.setUpdatedAt(new Date());
        return requestSuratRepository.save(requestSurat);
    }

    public RequestSurat updateRequestSurat(Long id, RequestSurat updatedRequestSurat) {
        return requestSuratRepository.findById(id)
                .map(existingRequestSurat -> {
                    existingRequestSurat.setJenisSurat(updatedRequestSurat.getJenisSurat());
                    existingRequestSurat.setUser(updatedRequestSurat.getUser());
                    existingRequestSurat.setStatus(updatedRequestSurat.getStatus());
                    existingRequestSurat.setUpdatedAt(new Date());
                    return requestSuratRepository.save(existingRequestSurat);
                })
                .orElse(null);
    }

    public boolean deleteRequestSurat(Long id) {
        if (requestSuratRepository.existsById(id)) {
            requestSuratRepository.deleteById(id);
            return true;
        }
        return false;
    }
}
