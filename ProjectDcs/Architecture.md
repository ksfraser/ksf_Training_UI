# Architecture - ksf_Training_UI

## Document Information
- **Module**: ksf_Training_UI
- **Version**: 1.0.0
- **Date**: 2026-05-11
- **Status**: Implemented
- **Author**: KSFII Development Team

---

## 1. Module Overview

ksf_Training_UI provides the WordPress ESS user interface for Training functionality.

### 1.1 Namespace
`Ksfraser\TrainingUI`

### 1.2 Adapter Pattern
```
ksf_Training (Business Logic)
    ↓
ksf_Training_UI (WordPress ESS Adapter)
    ↓
    WordPress ESS Portal
```

---

## 2. Component Architecture

### 2.1 Presenter Layer

| Presenter | Description |
|-----------|-------------|
| ListPresenter | List page logic |
| FormPresenter | Form handling |
| DetailPresenter | Detail view logic |

### 2.2 AJAX Handlers

| Endpoint | Action | Description |
|----------|--------|-------------|
| ksf_Training_list | getList | Get items |
| ksf_Training_save | saveItem | Save item |
| ksf_Training_delete | deleteItem | Delete item |

---

## 3. Integration

### Consumed From
| Module | Interface |
|--------|-----------|
| ksf_Training | Business logic |

### WordPress Integration
| Hook | Description |
|------|-------------|
| wp_ajax_ksf_Training | AJAX handlers |
| ksf_Training_template | Page templates |

---

*Document Version: 1.0.0*
*Last Updated: 2026-05-11*
