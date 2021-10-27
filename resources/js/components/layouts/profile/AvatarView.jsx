import React,{useState, useEffect} from 'react';
import {Badge, Avatar} from '@mui/material';
import {useStyles} from '../../styles/Styles';
import {GetProfileImages} from '../../services/ProfileService';
import AccountCircleIcon from '@mui/icons-material/AccountCircle';

export default function AvatarView(props) {
    
    const {viewID} = props;
    const classes = useStyles();
    const [url, setUrl] = useState('');
    const [active, setActive] = useState(true);

    useEffect(()=> {
        if (viewID) {
            const data = {
                user_id:viewID
            }
            GetProfileImages(data)
            .then(response => {
                    setUrl(response.images.avatar);
            });
        }
    }, [viewID]);

    return (
        <>
            <Badge
                overlap="circular"  variant="dot" classes={{badge:(active?classes.activeBadge:classes.unactiveBadge)}}
                anchorOrigin={{
                    vertical: 'bottom',
                    horizontal: 'right',
                }}
                
            >
                <Avatar src={`${process.env.MIX_PUBLIC_URL}/${url}`} classes={{root:classes.avatarView}} children=<AccountCircleIcon/> />
            </Badge>
        </>
    )
}
