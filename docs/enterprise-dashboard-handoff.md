# Elvora Enterprise CMS Dashboard Handoff

## Platform

- Laravel 12
- Filament 5.6 runtime in this repository
- Tailwind CSS via `resources/css/filament/admin/theme.css`
- Breeze authentication
- Spatie Permission-ready user roles

## Design Tokens

- Primary: `#003366`
- Accent: `#CC9933`
- Light surface: `#FFFFFF`
- Dark surface: `#0F172A`
- Border: `rgba(15, 23, 42, 0.08)` / `rgba(255, 255, 255, 0.08)`
- Radius: `0.5rem` standard, `0.75rem` dashboard sections
- Focus: gold accessible focus ring via `--elvora-focus`

Tokens are defined in `resources/css/filament/admin/theme.css` and mapped to Filament section, sidebar, table, button, widget, and topbar classes.

## Filament Component Mapping

- CEO dashboard: `ExecutiveCommandCenter`, `StatsOverview`, `LeadFunnelChart`, `ProjectPipelineChart`, `BlogPerformanceChart`, `EnterpriseActivityCenter`, `OperationsHealth`
- Analytics screens: `EnterpriseAnalytics` page
- Activity screens: `ActivityCenter` page
- System screens: `SystemCenter` page
- CMS screens: `BlogResource`, `CategoryResource`
- CRM screens: `ContactMessageResource`, `ProjectRequestResource`
- User management: `UserResource`
- Settings: `SettingResource`

## Information Architecture

Navigation groups:

- Dashboard
- Content
- Lead Management
- Marketing
- Analytics
- Users
- Settings
- System

## Implemented Enterprise Patterns

- Executive overview with health score, pipeline value, lead velocity, audience, and priorities
- Eight KPI stat cards for leads, projects, conversion, visitors, newsletter, articles, revenue potential, and opportunities
- Lead funnel and project pipeline charts
- Blog performance analytics
- Activity center for recent leads, messages, and content changes
- System center modules for audit logs, error logs, backups, performance, queues, and activity logs
- Quick action center for blog, category, project request, team member, export lead, schedule post, and settings flows
- CMS filters for categories, authors, publishing state
- Lead filters for status and owner
- CRM lifecycle stages: new, contacted, qualified, proposal sent, negotiation, won, lost, closed

## Future Data Modules

The design now reserves UI space for these modules, but they still need database models/resources before they can become fully interactive:

- Media folders and asset tagging
- Saved filters
- Approval workflow
- Revision history
- Audit log storage
- Queue and backup telemetry
- Global command palette extensions beyond Filament global search

