import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                brand: {
                    primary: '#003366',
                    primaryDark: '#001F3D',
                    secondary: '#CC9933',
                    secondaryDark: '#99701F',
                    bg: '#FFFFFF',
                    surfaceLight: '#F8FAFC',
                    surfaceDark: '#0F172A',
                    borderLight: '#E2E8F0',
                    textDark: '#0F172A',
                    textMuted: '#475569',
                    // Semantic Tokens (Keeping these for compatibility)
                    semanticBg: {
                        light: '#FAFAFA',
                        dark: '#000000',
                    },
                    surface: {
                        light: '#FFFFFF',
                        dark: '#0A0A0A',
                    },
                    border: {
                        light: '#E2E8F0',
                        dark: '#1e293b',
                    },
                    text: {
                        primary: '#0F172A',
                        muted: '#64748b',
                        dark: '#F8FAFC',
                        darkMuted: '#94a3b8',
                    }
                },
                // Blog Redesign Unified Tokens
                "primary": "#001e40",
                "on-primary": "#ffffff",
                "primary-container": "#003366",
                "on-primary-container": "#799dd6",
                "secondary": "#7c5800",
                "on-secondary": "#ffffff",
                "secondary-container": "#fec65c",
                "on-secondary-container": "#745200",
                "surface": "#f8f9ff",
                "on-surface": "#0b1c30",
                "surface-variant": "#d3e4fe",
                "on-surface-variant": "#43474f",
                "background": "#f8f9ff",
                "on-background": "#0b1c30",
                "outline": "#737780",
                "outline-variant": "#c3c6d1",
                "surface-container-lowest": "#ffffff",
                "surface-container-low": "#eff4ff",
                "surface-container": "#e5eeff",
                "surface-container-high": "#dce9ff",
                "surface-container-highest": "#d3e4fe",
                "inverse-surface": "#213145",
                "inverse-on-surface": "#eaf1ff",
                "inverse-primary": "#a7c8ff",
                "error": "#ba1a1a",
                "on-error": "#ffffff",
                "error-container": "#ffdad6",
                "on-error-container": "#93000a",
                "tertiary": "#381300",
                "on-tertiary": "#ffffff",
                "tertiary-container": "#592300",
                "on-tertiary-container": "#d8885c",
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Outfit', 'sans-serif'],
                mono: ['JetBrains Mono', 'monospace'],
                serif: ['Lora', 'serif'],
                // Blog redesign specific
                'h1': ['Inter'],
                'h2': ['Inter'],
                'h3': ['Inter'],
                'body-md': ['Inter'],
                'body-lg': ['Inter'],
                'label-sm': ['Inter'],
                'ui-mono': ['JetBrains Mono'],
            },
            spacing: {
                "xxl": "80px",
                "xl": "40px",
                "container-max": "1280px",
                "xs": "4px",
                "sm": "8px",
                "lg": "24px",
                "gutter": "24px",
                "md": "16px"
            },
            fontSize: {
                "h1": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                "h2": ["32px", {"lineHeight": "40px", "fontWeight": "600"}],
                "h3": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                "label-sm": ["14px", {"lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "500"}],
                "ui-mono": ["13px", {"lineHeight": "16px", "fontWeight": "450"}],
            },
            boxShadow: {
                premium: '0 10px 40px -10px rgba(0, 30, 64, 0.08), 0 1px 3px 0 rgba(0, 0, 0, 0.02)',
                premiumHover: '0 20px 40px -10px rgba(0, 30, 64, 0.15), 0 1px 10px 0 rgba(0, 0, 0, 0.05)',
                dark: '0 10px 30px -10px rgba(0, 0, 0, 0.6), 0 1px 3px 0 rgba(0, 0, 0, 0.4)',
                glow: '0 0 20px rgba(204, 153, 51, 0.4)',
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                'fade-in': 'fadeIn 0.4s ease-out forwards',
                'marquee': 'marquee 30s linear infinite',
                'pulse-glow': 'pulseGlow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                marquee: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-100%)' },
                },
                pulseGlow: {
                    '0%, 100%': { opacity: '1', boxShadow: '0 0 15px rgba(204, 153, 51, 0.3)' },
                    '50%': { opacity: '.8', boxShadow: '0 0 30px rgba(204, 153, 51, 0.6)' },
                }
            }
        },
    },
    plugins: [forms],
};
