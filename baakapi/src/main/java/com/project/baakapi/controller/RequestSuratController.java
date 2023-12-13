package com.project.baakapi.controller;

import com.project.baakapi.model.RequestSurat;
import com.project.baakapi.service.RequestSuratService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/request-surat")
public class RequestSuratController {

    private final RequestSuratService requestSuratService;

    @Autowired
    public RequestSuratController(RequestSuratService requestSuratService) {
        this.requestSuratService = requestSuratService;
    }

    @GetMapping
    public ResponseEntity<List<RequestSurat>> getAllRequestSurats() {
        List<RequestSurat> requestSurats = requestSuratService.getAllRequestSurats();
        return new ResponseEntity<>(requestSurats, HttpStatus.OK);
    }

    @GetMapping("/{id}")
    public ResponseEntity<RequestSurat> getRequestSuratById(@PathVariable Long id) {
        return requestSuratService.getRequestSuratById(id)
                .map(requestSurat -> new ResponseEntity<>(requestSurat, HttpStatus.OK))
                .orElseGet(() -> new ResponseEntity<>(HttpStatus.NOT_FOUND));
    }

    @PostMapping
    public ResponseEntity<RequestSurat> createRequestSurat(@RequestBody RequestSurat requestSurat) {
        RequestSurat createdRequestSurat = requestSuratService.createRequestSurat(requestSurat);
        return new ResponseEntity<>(createdRequestSurat, HttpStatus.CREATED);
    }

    @PutMapping("/{id}")
    public ResponseEntity<RequestSurat> updateRequestSurat(@PathVariable Long id, @RequestBody RequestSurat updatedRequestSurat) {
        RequestSurat updatedSurat = requestSuratService.updateRequestSurat(id, updatedRequestSurat);
        if (updatedSurat != null) {
            return new ResponseEntity<>(updatedSurat, HttpStatus.OK);
        } else {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteRequestSurat(@PathVariable Long id) {
        boolean isDeleted = requestSuratService.deleteRequestSurat(id);
        if (isDeleted) {
            return new ResponseEntity<>(HttpStatus.NO_CONTENT);
        } else {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }
}
