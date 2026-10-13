TODO - Blog Implementation

## Infrastructure & Setup
- [x] verify dev environment
- [ ] Set up admin dashboard layout and routing
- [ ] Create admin authentication middleware
- [ ] Set up WYSIWYG editor library (TinyMCE or Quill.js)
- [ ] Create reusable admin table component

## User Management & Roles/Permissions
- [ ] Create Role model and migration
- [ ] Create Permission model and migration
- [ ] Create role_user pivot table migration
- [ ] Create permission_role pivot table migration
- [ ] Add role/permission checks to User model
- [ ] Create RoleController with CRUD operations
- [ ] Create PermissionController with CRUD operations
- [ ] Create admin users list page with role assignment
- [ ] Create role management page with permission assignment
- [ ] Add middleware for role-based access control
- [ ] Add middleware for permission-based access control

## Blog Posts Management
- [ ] Create Post model and migration (title, slug, content, excerpt, featured_image, published_at, user_id, category_id)
- [ ] Create PostController with CRUD operations
- [ ] Create blog post index page (admin view)
- [ ] Create blog post create/edit form with WYSIWYG editor
- [ ] Create blog post show page (public view)
- [ ] Add post status (draft, published, archived)
- [ ] Add soft deletes to Post model

## Category Management
- [ ] Create Category model and migration (name, slug, description)
- [ ] Create CategoryController with CRUD operations
- [ ] Create categories management page (list, create, edit, delete)
- [ ] Add category_post relationship validation
- [ ] Create category dropdown/select component for post editing
- [ ] Add category show page (list posts in category)
- [ ] Implement category hierarchy (parent/child categories)

## Menu Management
- [ ] Create Menu model and migration
- [ ] Create MenuItem model and migration (menu_id, label, url, icon, order, parent_id)
- [ ] Create MenuController with CRUD operations
- [ ] Create menu management interface with drag-drop reordering
- [ ] Add menu builder page with nested items
- [ ] Create menu rendering helper function
- [ ] Add menu frontend display component
- [ ] Implement menu link validation

## Frontend/Blog Display
- [ ] Create public blog posts listing page
- [ ] Create blog post detail page
- [ ] Add blog post search functionality
- [ ] Create category filtering for blog posts
- [ ] Add pagination to blog list
- [ ] Create blog sidebar with categories widget
- [ ] Add blog comments section (optional)
- [ ] Create admin post preview functionality
- [ ] Add featured posts section

## Documentation
- [x] api scrumble
- [ ] Model Properties (Larastan / IDE-Helper)
- [ ] Code Health (Larastan)
- [ ] Frontend UI (Storybook)

## Testing
- [ ] Create tests for Role model
- [ ] Create tests for Permission model
- [ ] Create tests for Post model
- [ ] Create tests for Category model
- [ ] Create tests for Menu model
- [ ] Create Feature tests for PostController
- [ ] Create Feature tests for CategoryController
- [ ] Create Feature tests for MenuController
- [ ] Create Feature tests for RoleController
- [ ] Test role-based access control

## Frontend Dependencies
- [ ] Install WYSIWYG editor library
- [ ] Install drag-drop library for menu reordering
- [ ] Add admin panel CSS/styling
- [ ] Add form validation library

## Security & Validation
- [ ] Add slug generation for categories
- [ ] Add slug generation for posts
- [ ] Implement XSS protection for WYSIWYG content
- [ ] Add authorization checks for post ownership
- [ ] Validate menu items URLs
- [ ] Add rate limiting for public blog access