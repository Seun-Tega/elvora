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
                    primary: '#001e40',
                    primaryDark: '#00132b',
                    secondary: '#cc9933', // Updated to requested CC9933
                    secondaryDark: '#997326',
                    // Semantic Tokens
                    bg: {
                        light: '#FAFAFA', // Ultra clean white/gray
                        dark: '#000000', // Pure black like Vercel/Linear
                    },
                    surface: {
                        light: '#FFFFFF', // Pure white
                        dark: '#0A0A0A', // Near black for cards
                    },
                    border: {
                        light: '#E2E8F0', // Slate 200
                        dark: '#1e293b', // Slate 800
                    },
                    text: {
                        primary: '#0F172A',
                        muted: '#64748b', // Slate 500
                        dark: '#F8FAFC',
                        darkMuted: '#94a3b8', // Slate 400
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
    plugins: [forms],
};
