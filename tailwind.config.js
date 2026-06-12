import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        screens: {
            'xs': '375px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
            '3xl': '1920px',
            '4xl': '2560px',
            '5xl': '3840px',
        },
        extend: {
            fontSize: {
                'fluid-xs': 'clamp(0.75rem, 0.2vw + 0.7rem, 0.875rem)',
                'fluid-sm': 'clamp(0.875rem, 0.3vw + 0.8rem, 1rem)',
                'fluid-base': 'clamp(1rem, 0.5vw + 0.875rem, 1.125rem)',
                'fluid-lg': 'clamp(1.125rem, 0.8vw + 0.925rem, 1.5rem)',
                'fluid-xl': 'clamp(1.25rem, 1vw + 1rem, 2rem)',
                'fluid-2xl': 'clamp(1.5rem, 1.5vw + 1.125rem, 2.5rem)',
                'fluid-3xl': 'clamp(1.875rem, 2vw + 1.375rem, 3.5rem)',
                'fluid-4xl': 'clamp(2.25rem, 3vw + 1.5rem, 4.5rem)',
                'fluid-5xl': 'clamp(3rem, 4vw + 2rem, 6rem)',
                'fluid-6xl': 'clamp(3.75rem, 5vw + 2.5rem, 8rem)',
            },
            colors: {
                brand: {
                    primary: '#003366',
                    primaryDark: '#001F3D',
                    secondary: '#CC9933',
                    secondaryDark: '#99701F',
                    bg: {
                        light: '#FAFAFA',
                        dark: '#000000',
                    },
                    surfaceLight: '#F8FAFC',
                    surfaceDark: '#0F172A',
                    borderLight: '#E2E8F0',
                    textDark: '#0F172A',
                    textMuted: '#475569',
                    // Semantic Tokens
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
                // Material Design 3 unified tokens (used in blog)
                surface: "#f8f9ff",
                "on-surface": "#0b1c30",
                "surface-variant": "#d3e4fe",
                "on-surface-variant": "#43474f",
                "outline-variant": "#c3c6d1",
                "primary-container": "#003366",
                "secondary-container": "#fec65c",
                "on-secondary-container": "#745200",
                "surface-container-lowest": "#ffffff",
                "surface-container-low": "#eff4ff",
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Outfit', 'sans-serif'],
                mono: ['JetBrains Mono', 'monospace'],
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
    plugins: [forms, typography],
};
